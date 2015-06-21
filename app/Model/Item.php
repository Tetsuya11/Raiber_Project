<?php

class Item extends AppModel {
    //public $hasOne ='Category';

	public $hasMany = 'Post';
	public $belongsTo = 'Category';
	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'discription' => array(
            'rule' => 'notEmpty'
        )
    );

    public $actsAs = array(
            'UploadPack.Upload' => array(    //ここでは、"_file_name"を除いたカラム名を書く
                'image1' => array(
                    'quality' => 95,        //画質指定、デフォルトでは75
                    'styles' => array(
                            'thumb' => '85×85'   //リサイズしたいサイズを書く
                        )
                    )
                )
        );

}

?>