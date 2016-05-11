<?php

namespace Controller;

class MovieController extends AbstractController
{

    public function showMoviesPaginated()
    {
        
    }

    public function showMovie()
    {
        $movieTitle = $this->getCustomParam('title');
        $movieRepo = $this->getRepository('movie');
        $moviesByTitle = $movieRepo->loadByProperties(['title' => $movieTitle]);
        if (empty($moviesByTitle)) {
            return $this->application->abort(404);
        }
        $movie = reset($moviesByTitle);
        $context = [
            'movie' => $movie,
            'movieGenre' => 'Comedie'
        ];
        return $this->render('showmovie', $context);
    }

    protected function getClassName()
    {
        return 'Controller\\MovieController';
    }

    private function getMovieById($movieId)
    {
        $movieRepo = $this->getRepository('movie');
        $moviesByTitle = $movieRepo->loadByProperties(['id' => $movieId]);
        if (empty($moviesByTitle)) {
            return null;
        }
        return reset($moviesByTitle);
    }

    public function computeIncome()
    {
        $movieId = $this->getCustomParam('id');
        $context = array(
            'movie' => $this->getMovieById($movieId),
        );
        if ($this->request->isMethod('POST')) {
            $start = $this->getPostParam('start_date');
            $startDate = new \DateTime($start);
            $end = $this->getPostParam('end_date');
            $endDate = new \DateTime($end);
            $scheduleRepo = $this->getRepository('schedule');
            var_dump($scheduleRepo->getProjectedIncomeForMovieBetween($startDate, $endDate, $movieId));
            return $this->redirectRoute('admin_movie_income', ['id' => $movieId]);
        }
        return $this->render('income', $context);
    }

}
