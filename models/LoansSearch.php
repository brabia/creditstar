<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Loans;

/**
 * LoansSearch represents the model behind the search form about `app\models\Loans`.
 */
class LoansSearch extends Loans
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loanId', 'userId', 'duration', 'dateApplied', 'dateLoanEnds', 'campaign', 'status'], 'integer'],
            [['amount', 'interest'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Loans::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'loanId' => $this->loanId,
            'userId' => $this->userId,
            'amount' => $this->amount,
            'interest' => $this->interest,
            'duration' => $this->duration,
            'dateApplied' => $this->dateApplied,
            'dateLoanEnds' => $this->dateLoanEnds,
            'campaign' => $this->campaign,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
