<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Repository\RoomRepository;

class RoomController extends AbstractController
{
    public function showAllRooms()
    {
        $roomRepository = $this->getRepository('room');
        $roomList = $roomRepository->loadAll();
        $context = [
            'roomList' => $roomList,
        ];
        return $this->render('room', $context);

    }
    
    public function addRoom()
    {
        
    }
    
    public function editRoom()
    {
        $data=array();
        $data['title']='Error';
        $data['message'] = "Could not update!";
        $data['type'] = "error";
        
     $roomRepository = $this->getRepository('room');
   
     try{
         $roomEntity = $roomRepository->loadByProperties(['id' => $this->getCustomParam('id')]);
     } catch (Exception $ex) {
            return $this->application->json($data);
     }


     if(count($roomEntity)!=1)
     {
         return $this->application->json($data);
     }
     

    $data['title']='Succes!';
    $data['message'] = "Updated!";
    $data['type'] = "succes";
     
     $entity = reset($roomEntity);
     //$entity->setName($this->getCustomParam('value'));
     $entity->setCapacity($this->getCustomParam('value'));
     try
     {
        $roomRepository->save($entity);
     } catch (Exception $ex) {
        return $this->application->json($data);
     }

    
    return $this->application->json($data);
     
     
    }
    
    public function getClassName() {
        return 'Controller\\RoomController';
    }
}
