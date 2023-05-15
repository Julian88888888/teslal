<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class LeadForm extends Model
{
    public $phone;
    public $email;
    public $name;
    public $type;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['phone', 'email'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            [['name', 'type'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    // public function sendEmail($email)
    // {
    //     return Yii::$app->mailer->compose()
    //         ->setTo($email)
    //         ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
    //         ->setReplyTo([$this->email => $this->name])
    //         ->setSubject($this->subject)
    //         ->setTextBody($this->body)
    //         ->send();
    // }
}
