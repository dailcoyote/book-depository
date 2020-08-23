<?php

namespace app\modules\v1\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\v1\models\Book]].
 *
 * @see \app\modules\v1\models\Book
 */
class BookQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\Book[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\Book|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
