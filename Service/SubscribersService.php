<?php

namespace MailerLiteBundle\Service;

use GuzzleHttp\Client;

class SubscribersService
{
    private $default_list;
    private $api_key;

    /**
     * @param $config
     */
    public function __construct($config)
    {
        $this->default_list = $config['default_list'];
        $this->api_key = $config['api_key'];
    }


    /**
     * @param null $list
     * @param $email
     * @return bool
     */
    public function addSubscriber($email, $list = null)
    {
        $client = new Client;

        $api_key = $this->api_key;
        if (!$list) $list = $this->default_list;

        $response = $client->request(
            'POST',
            'https://app.mailerlite.com/api/v1/subscribers/'.$list.'/?apiKey='.$api_key,
            [
                'form_params' => [
                    'email' => $email,
                ]
            ]
        );

        if($response->getStatusCode() == 200){
            return true;
        }

        return false;
    }

    /**
     * @param $email
     * @return bool
     */
    public function unsubscribeSubscriber($email)
    {
        $client = new Client;

        $api_key = $this->api_key;

        $response = $client->request(
            'POST',
            'https://app.mailerlite.com/api/v1/subscribers/unsubscribe/?apiKey='.$api_key,
            [
                'form_params' => [
                    'email' => $email,
                ]
            ]
        );

        if($response->getStatusCode() == 200){
            return true;
        }

        return false;
    }

    /**
     * @param $email
     * @param $listId
     * @return bool
     */
    public function deleteSubscriber($listId, $email)
    {
        $client = new Client;

        $api_key = $this->api_key;

        $response = $client->request(
            'DELETE',
            'https://app.mailerlite.com/api/v1/subscribers/'.$listId.'/?apiKey='.$api_key,
            [
                'form_params' => [
                    'email' => $email,
                ]
            ]
        );

        if($response->getStatusCode() == 200){
            return true;
        }

        return false;
    }


}