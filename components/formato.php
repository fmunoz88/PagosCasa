<?php

    namespace app\components;
    
    Use Yii;

    class formato {

        public static function formatPesosSigned($value){
            
            $format = Yii::$app->formatter->asCurrency($value,'$');

            return $format;
        }

    }

?>