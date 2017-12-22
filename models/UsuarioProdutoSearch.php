<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioProduto;

/**
 * UsuarioProdutoSearch represents the model behind the search form about `app\models\UsuarioProduto`.
 */
class UsuarioProdutoSearch extends UsuarioProduto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['produto_id', 'usuario_usuario_id'], 'integer'],
            [['preco'], 'number'],
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
        $query = UsuarioProduto::find();

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
            'produto_id' => $this->produto_id,
            'preco' => $this->preco,
            'usuario_usuario_id' => $this->usuario_usuario_id,
        ]);

        return $dataProvider;
    }
}
