<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Buku;

/**
 * BukuSearch represents the model behind the search form about `app\models\Buku`.
 */
class BukuSearch extends Buku
{
     public $globalSearch; 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_jenis', 'id_penulis'], 'integer'],
            [['nama', 'cover','globalSearch'], 'safe'],
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
        $query = Buku::find();

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
       /* $query->andFilterWhere([
            'id' => $this->id,
            'id_jenis' => $this->id_jenis,
            'id_penulis' => $this->id_penulis,
        ]);*/

        $query->orFilterWhere(['like', 'id', $this->globalSearch])
            ->orFilterWhere(['like', 'id_jenis', $this->globalSearch])
            ->orFilterWhere(['like', 'id_penulis', $this->globalSearch])
            ->orFilterWhere(['like', 'nama', $this->globalSearch])
            ->orFilterWhere(['like', 'cover', $this->globalSearch]);

        return $dataProvider;
    }
}
