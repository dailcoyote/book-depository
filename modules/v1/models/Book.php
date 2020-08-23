<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "{{%books}}".
 *
 * @property int $id
 * @property string $title
 * @property string $isbn
 * @property int|null $author_id
 *
 * @property Author $author
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%books}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'isbn'], 'required'],
            [['author_id'], 'integer'],
            [['title'], 'string', 'max' => 512],
            [['isbn'], 'string', 'max' => 16],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Наименование'),
            'isbn' => Yii::t('app', 'Номер книжного издания'),
            'author_id' => Yii::t('app', 'Author ID'),
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\v1\models\query\AuthorQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\query\BookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\v1\models\query\BookQuery(get_called_class());
    }
}
