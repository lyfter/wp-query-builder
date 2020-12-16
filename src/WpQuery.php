<?php


namespace QueryBuilder;


class WpQuery
{
    private \WP_Query $queryObject;
    
    public function __construct()
    {
        $this->queryObject = new \WP_Query();
    }
    
    public static function build(): WpQuery
    {
        return new static();
    }
    
    public function getQueryObject(): \WP_Query
    {
        return $this->queryObject;
    }
    
    public function get($fields = '')
    {
        if ($fields) {
            $this->fields($fields);
        }
        
        return $this->queryObject->get_posts();
    }
    
    public function setArgument($key, $value)
    {
        $this->queryObject->set($key, $value);
        
        return $this;
    }
    
    public function fields($fields)
    {
        return $this->setArgument('fields', $fields);
    }
    
    public function type($type)
    {
        return $this->setArgument('post_type', $type);
    }
    
    public function status($status)
    {
        return $this->setArgument('post_status', $status);
    }
    
    public function limit($limit)
    {
        return $this->setArgument('posts_per_page', $limit);
    }
}