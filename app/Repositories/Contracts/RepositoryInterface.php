<?php 
namespace App\Repositories\Contracts;

interface RepositoryInterface
{
	public __construct();
	public function makeEntity;
	public function orderBy($attr, $dir = 'asc');
	public function all($columns = ['*']);
	public function findBy($attribute, $value, $shoudThrowException = true);
	public function findById($id);
	public function whereIn($attribute, array $value, $columns = ['*']);
	public function where(array $where, $columns = ['*']);
	public function findById($id);
	public function findById($id);
	public function findById($id);
	public function findById($id);
	public function findById($id);
	public function findById($id);
	public function findById($id);
	public function findById($id);
	public function findById($id);
	public function findById($id);
	public function findById($id);
	public function findById($id);
	public function findById($id);
	public function findById($id);
	public function findById($id);

}