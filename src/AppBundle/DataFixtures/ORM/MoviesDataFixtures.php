<?php
namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Actor;
use AppBundle\Entity\Genre;
use AppBundle\Entity\Movie;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MoviesDataFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getOrder()
    {
        return 10;
    }

    public function load(ObjectManager $manager)
    {
        $actors = array(
            "Jonny Depp",
            "Tom Cruise",
            "Angelina Jolie"
        );

        $genres = array(
            "Accion",
            "Comedia",
            "Drama"
        );

        $movies = array(
            "The Shawshank Redemption",
            "The Godfather",
            "The Dark Knight",
            "Angry Men"
        );

        $actors_array = array();
        foreach ($actors as $actor){
            $actor_new = new Actor();
            $actor_new->setName($actor);
            $manager->persist($actor_new);
            $actors_array[]=$actor_new;
        }

        $genres_array = array();
        foreach ($genres as $genre){
            $genre_new = new Genre();
            $genre_new->setName($genre);
            $manager->persist($genre_new);
            $genres_array[]=$genre_new;
        }

        foreach ($movies as $movie){
            $movie_new = new Movie();
            $movie_new->setName($movie);
            $movie_new->setYear(rand(1914,2017));
            $movie_new->setGenre($genres_array[array_rand($genres_array)]);
            $cantidad = rand(1,3);
            for ($i=1;$i<$cantidad;$i++){
                $movie_new->addActor($actors_array[$i]);
            }
            $manager->persist($movie_new);
        }

        $manager->flush();
    }


}