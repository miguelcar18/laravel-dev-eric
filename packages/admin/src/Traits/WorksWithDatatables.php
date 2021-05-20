<?php

namespace Packages\Admin\Traits;

trait WorksWithDatatables
{
    public function paginate($with_trashed = false, $from_query = null)
    {
        $query = $from_query ?? $this->model->newQuery();

        $qury = $query->when($with_trashed, function ($q) {
            return $q->withTrashed(); #->withTrashed(); Si implementara el trait SoftDeletes
        });

        $length = $this->paginateLength();
        $page = $this->currentPage();

        $query = $this->searching($query);
        $query = $this->ordering($query);

        return $query->paginate($length, $columns = ['*'], $page_name = 'page', $page);
    }

    protected function currentPage($counting_from = null)
    {
        if (is_null($counting_from)) {
            $total = $this->model->count();
            $length = $this->paginateLength();
        } else {
            $total = $counting_from->count();
            $length = $this->paginateLength($counting_from);
        }
        $start = intval(request()->start);
        if ($total == $length || $start == 0) {
            return 1;
        }

        return intdiv($start, $length) + 1;
    }

    protected function paginateLength($counting_from = null)
    {
        $length = request()->length ?? 15;
        if ($length == -1) {
            $length = is_null($counting_from) ? $this->model->count() : $counting_from->count();
        }

        return $length;
    }

    protected function ordering($query)
    {
        $columns = request()->columns ?? [];
        foreach (request()->order ?? [] as $index => $order) {
            if (filter_var($columns[$order['column']]['orderable'], FILTER_VALIDATE_BOOLEAN)) {
                $query->orderBy($columns[$order['column']]['name'], $order['dir']);
            }
        }

        return $query;
    }

    protected function searching($query)
    {
        if (!empty(request()->search) && is_array(request()->search) && !empty($search = request()->search['value'] ?? '')) {
            $columns = request()->columns ?? [];
            $query->where(function ($query) use ($columns, $search) {
                $query->where('id', 'like', "{$search}%");
                $searh = str_replace([' ', '.', '-', '?'], '%', $search);
                foreach ($columns as $index => $column) {
                    if (filter_var($column['searchable'], FILTER_VALIDATE_BOOLEAN)) {
                        $query->orWhere($column['name'], 'like', "%{$search}%");
                    }
                }
            });
        }
        return $query;
    }
}
