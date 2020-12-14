<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bill".
 *
 * @property int $id
 * @property string|null $bill_code
 * @property int $issue_to
 * @property int $issue_from
 * @property int|null $total
 * @property int|null $status
 *
 * @property User $issueTo
 * @property User $issueFrom
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bill_code'], 'string'],
            [['issue_to', 'issue_from'], 'required'],
            [['issue_to', 'issue_from', 'total', 'status'], 'integer'],
            [['issue_to'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['issue_to' => 'id']],
            [['issue_from'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['issue_from' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bill_code' => 'Bill Code',
            'issue_to' => 'Issue To',
            'issue_from' => 'Issue From',
            'total' => 'Total',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[IssueTo]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getIssueTo()
    {
        return $this->hasOne(User::className(), ['id' => 'issue_to']);
    }

    /**
     * Gets query for [[IssueFrom]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getIssueFrom()
    {
        return $this->hasOne(User::className(), ['id' => 'issue_from']);
    }

    /**
     * {@inheritdoc}
     * @return BillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BillQuery(get_called_class());
    }
}
