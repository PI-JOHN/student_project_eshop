<?php


class Order
{
    /** save order to database
     * @param $userName
     * @param $userPhone
     * @param $userComment
     * @param $userId
     * @param $productsInCart
     * @return bool
     */
    public static function save($userName, $userPhone, $userComment, $userId, $productsInCart)
    {
        $db = Db::getConnectionMag();
        $productsInCart = json_encode($productsInCart);
        $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products)
VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';
        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':products', $productsInCart, PDO::PARAM_STR);
        return $result->execute();
    }
}