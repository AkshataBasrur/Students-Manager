<?php
    namespace app\models;
    use yii\db\ActiveRecord;

    class Studinfo extends ActiveRecord
    {
        private $id;
        private $fname;
        private $lname;
        private $email;
        private $picture;
        private $marks;
        private $status;
        public $file;

        public function rules()
        {
            return[
                [['id','fname','lname','email','picture','marks','status'],'required'],
                [['file'],'file'],
                [['picture'],'string','max'=> 100]
            ];
        }
    }
?>