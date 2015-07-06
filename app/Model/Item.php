<?php

class Item extends AppModel {
    //public $hasOne ='Category';

    public $belongsTo = array('User', 'Category');
	public $hasMany = 'Post';
    
	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'discription' => array(
            'rule' => 'notEmpty'
        )
    );
    /*
    public $actsAs = array(
            'UploadPack.Upload' => array(    //ここでは、"_file_name"を除いたカラム名を書く
                'image1' => array(
                    'quality' => 95,        //画質指定、デフォルトでは75
                    'styles' => array(
                            'thumb' => '85×85'   //リサイズしたいサイズを書く
                        )
                    ),
                'image2' => array(
                    'quality' => 95,        //画質指定、デフォルトでは75
                    'styles' => array(
                            'thumb' => '85×85'   //リサイズしたいサイズを書く
                        )
                    ),
                'image3' => array(
                    'quality' => 95,        //画質指定、デフォルトでは75
                    'styles' => array(
                            'thumb' => '85×85'   //リサイズしたいサイズを書く
                        )
                    )
                )
    );
    */
    public function isOwnedBy($item, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }

}

?>