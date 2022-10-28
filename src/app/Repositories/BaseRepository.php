<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseRepository
{
    /**
     * The repository model name
     *
     * @var String
     */
    protected string $name;
    /**
     * The query builder
     *
     * @var Builder
     */
    protected Builder $query;

    public function __construct()
    {
        $model = sprintf("App\Models\%s", $this->name);
        $this->query = $model::query();
    }

    public function getBy(): Collection
    {
        return $this->query->get();
    }

    public function firstBy()
    {
        return $this->query->first();
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        return $this->query->paginate($perPage, $columns, $pageName, $page);
    }

    public function findBy(string $column, $value, string $operator = '='): Builder
    {
        return $this->query->where($column, $operator, $value);
    }

    public function findLike(string $column, $value, $addBefore, $addAfter): Builder
    {
        return $this->query->where($column, 'LIKE', $this->escapeLikeSentence($value, $addBefore, $addAfter));
    }

    public function findIn(string $column, $value): Builder
    {
        return $this->query->whereIn($column, $value);
    }

    public function findBetween(string $column, $from, $to): Builder
    {
        return $this->query->whereBetween($column, [$from, $to]);
    }

    public function relatedWith(array $relation): Builder
    {
        return $this->query->with($relation);
    }

    public function orderBy(string $column, string $direction = 'desc'): Builder
    {
        return $this->query->orderBy($column, $direction);
    }

    public function exists()
    {
        return $this->query->exists();
    }

    public function join(string $relatedTable, string $column, string $relatedColumn, string $operator = '=')
    {
        return $this->query->join($relatedTable, $column, $operator, $relatedColumn);
    }

    public function create(array $array)
    {
        return $this->query->create($array);
    }

    public function update(array $array): void
    {
        $this->query->update($array);
    }

    public function delete(): void
    {
        $this->query->delete();
    }

    /**
     * like検索用にエスケープして返す
     * @param string $str
     * @param bool $addBefore 先頭に'%'を付けるか
     * @param bool $addAfter 末尾に'%'を付けるか
     * @return string like用エスケープ済み
     */
    static private function escapeLikeSentence($str, $addBefore=false, $addAfter=false) {
        $result = str_replace('\\', '\\\\', $str);
        $result = str_replace('%', '\\%', $result);
        $result = str_replace('_', '\\_', $result);
        if($addBefore) {
            $result = '%'.$result;
        }
        if($addAfter) {
            $result .= '%';
        }
        return $result;
    }

}
