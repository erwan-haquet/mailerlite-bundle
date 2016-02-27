<?php

namespace MailerLiteBundle\Service;

use GuzzleHttp\Client;
use MailerLiteBundle\Wrapper\ListWrapper;
use MailerLiteBundle\Wrapper\UserWrapper;

class ListsService
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
     * @return Array
     */
    public function getAllLists()
    {
        $client = new Client();
        $api_key = $this->api_key;

        $response = $client->request(
            'GET',
            'https://app.mailerlite.com/api/v1/lists/?apiKey='.$api_key
        );

        if($response->getStatusCode() == 200){

            $data = json_decode($response->getBody(), true);

            $lists = array();
            foreach ($data['Results'] as $result){
                $list = new ListWrapper();
                $list->hydrate($result);
                $lists[] = $list;
            }

            return $lists;
        }

        return false;
    }

    /**
     * @param Integer $listId
     * @return ListWrapper $list
     */
    public function getListDetails($listId)
    {
        $client = new Client();
        $api_key = $this->api_key;

        $response = $client->request(
            'GET',
            'https://app.mailerlite.com/api/v1/lists/'.$listId.'/?apiKey='.$api_key
        );

        if($response->getStatusCode() == 200){

            $data = json_decode($response->getBody(), true);

            $list = new ListWrapper();
            $list->hydrate($data);

            return $list;
        }

        return false;
    }

    /**
     * @param String $listName
     * @return Bool
     */
    public function addList($listName)
    {
        $client = new Client;

        $api_key = $this->api_key;

        $response = $client->request(
            'POST',
            'https://app.mailerlite.com/api/v1/lists/?apiKey='.$api_key,
            [
                'form_params' => [
                    'name' => $listName,
                ]
            ]
        );

        if($response->getStatusCode() == 200){
            return true;
        }

        return false;
    }

    /**
     * @param String $listName
     * @param Integer $listId
     * @return Bool
     */
    public function updateList($listId, $listName)
    {
        $client = new Client;

        $api_key = $this->api_key;

        $response = $client->request(
            'POST',
            'https://app.mailerlite.com/api/v1/lists/'.$listId.'/?apiKey='.$api_key,
            [
                'form_params' => [
                    'name' => $listName,
                ]
            ]
        );

        if($response->getStatusCode() == 200){
            return true;
        }

        return false;
    }

    /**
     * @param Integer $listId
     * @return Bool
     */
    public function deleteList($listId)
    {
        $client = new Client;

        $api_key = $this->api_key;

        $response = $client->request(
            'DELETE',
            'https://app.mailerlite.com/api/v1/lists/'.$listId.'/?apiKey='.$api_key
        );

        if($response->getStatusCode() == 200){
            return true;
        }

        return false;
    }

    /**
     * @param Integer $listId
     * @return Array
     */
    public function getActiveSubscribers($listId)
    {
        $client = new Client();
        $api_key = $this->api_key;

        $response = $client->request(
            'GET',
            'https://app.mailerlite.com/api/v1/lists/'.$listId.'/active/?apiKey='.$api_key
        );

        if($response->getStatusCode() == 200){

            $data = json_decode($response->getBody(), true);

            $subscribers = array();
            foreach ($data['Results'] as $result){
                $subscriber = new UserWrapper();
                $subscriber->hydrate($result);
                $subscribers[] = $subscriber;
            }

            return $subscribers;
        }

        return false;
    }

    /**
     * @param Integer $listId
     * @return Array
     */
    public function getUnsubscribedSubscribers($listId)
    {
        $client = new Client();
        $api_key = $this->api_key;

        $response = $client->request(
            'GET',
            'https://app.mailerlite.com/api/v1/lists/'.$listId.'/unsubscribed/?apiKey='.$api_key
        );

        if($response->getStatusCode() == 200){

            $data = json_decode($response->getBody(), true);

            $subscribers = array();
            foreach ($data['Results'] as $result){
                $subscriber = new UserWrapper();
                $subscriber->hydrate($result);
                $subscribers[] = $subscriber;
            }

            return $subscribers;
        }

        return false;
    }

    /**
     * @param Integer $listId
     * @return Array
     */
    public function getBouncedSubscribers($listId)
    {
        $client = new Client();
        $api_key = $this->api_key;

        $response = $client->request(
            'GET',
            'https://app.mailerlite.com/api/v1/lists/'.$listId.'/bounced/?apiKey='.$api_key
        );

        if($response->getStatusCode() == 200){

            $data = json_decode($response->getBody(), true);

            $subscribers = array();
            foreach ($data['Results'] as $result){
                $subscriber = new UserWrapper();
                $subscriber->hydrate($result);
                $subscribers[] = $subscriber;
            }

            return $subscribers;
        }

        return false;
    }

}