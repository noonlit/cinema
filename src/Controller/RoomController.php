<?php

namespace Controller;

use Framework\Helper\Paginator;

class RoomController extends AbstractController
{

    /**
     * @return string
     */
    public function showAllRooms()
    {
        try {
            $roomRepository = $this->getRepository('room');
            $totalUsers = $roomRepository->getRowsCount();

            $currentPage = $this->getQueryParam('page');
            $usersPerPage = $this->getQueryParam('rooms_per_page');

            $paginator = new Paginator($currentPage, $totalUsers, $usersPerPage);

            $roomList = $roomRepository->loadPage($paginator->getCurrentPage(), $paginator->getResultsPerPage());

            $context = [
                'paginator' => $paginator,
                'roomList' => $roomList
            ];
            return $this->render('room', $context);
        } catch (Exception $ex) {
            $this->addErrorMessage('Something went wrong!');
            return $this->render('room', $context);
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addRoom()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';
        $errorResponse['message'] = 'Could not add!';

        $roomRepository = $this->getRepository('room');

        try {
            $roomEntities = $roomRepository->loadByProperties(['name' => $this->getPostParam('roomName')]);

            if (count($roomEntities) != 0) {
                return $this->application->json($errorResponse);
            }

            $properties = ['name' => $this->getPostParam('roomName'),
                'capacity' => (int) $this->getPostParam('roomCapacity')];

            $room = $this->getEntity('room', $properties);
            $roomRepository->save($room);

            $successResponse = array();
            $successResponse['roomId'] = $roomRepository->getMaxValue('id');
            $successResponse['roomName'] = $properties['name'];
            $successResponse['roomCapacity'] = $properties['capacity'];
            $successResponse['message'] = 'Room added!';
            $successResponse['title'] = 'Success!';
            $successResponse['type'] = 'success';

            return $this->application->json($successResponse);
        } catch (\Exception $ex) {
            return $this->application->json($errorResponse);
        }
    }

    /**
     * @return type
     */
    public function editRoom()
    {
        $errorResponse = array();
        $errorResponse['title'] = 'Error!';
        $errorResponse['type'] = 'error';

        $repository = $this->getRepository('room');

        try {
            $roomEntities = $repository->loadByProperties(['id' => $this->getCustomParam('id')]);

            if (count($roomEntities) != 1) {
                $errorResponse['message'] = 'Could not update! This room do not exist!';
                return $this->application->json($errorResponse);
            }

            $entity = reset($roomEntities);
            $newEntitName = $this->getPostParam('name');
            $result = $repository->loadByProperties(['name' => $newEntitName]);

            if (count($result) != 0) {
                $result = reset($result);
                if ($result->getId() != $this->getCustomParam('id')) {
                    $errorResponse['message'] = 'Could not update! This room name already exist!';
                    return $this->application->json($errorResponse);
                }
            }

            // Set edited properties
            $entity->setName($this->getPostParam('name'));
            $entity->setCapacity($this->getPostParam('capacity'));

            $repository->save($entity);

            $successResponse = array();
            $successResponse['message'] = 'Updated!';
            $successResponse['title'] = 'Success!';
            $successResponse['type'] = 'success';

            return $this->application->json($successResponse);
        } catch (Exception $ex) {
            $errorResponse['message'] = 'Could not update!';
            return $this->application->json($errorResponse);
        }
    }
}