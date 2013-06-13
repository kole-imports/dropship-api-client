<?php

namespace KoleImports\DropshipApi\Model\Request;

class Parameters
{
    /**
    *@var offset int
    */
    private $offset;

    /**
    *@var limit int
    */
    private $limit;

    public function setOffset($offset)
    {
        $this->offset = (int) $offset;

        return $this;
    }

    public function setLimit($limit)
    {
        $this->limit = (int) $limit;

        return $this;
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function getLimit()
    {
        return $this->limit;
    }
}
