<?php
declare(strict_types=1);

namespace Lyfter\QueryBuilder;

use WP_Query;

class WpQuery
{
    protected WP_Query $queryObject;

    public function __construct()
    {
        $this->queryObject = new WP_Query();
    }

    public static function build(): WpQuery
    {
        return new static();
    }

    public function getQueryObject(): WP_Query
    {
        return $this->queryObject;
    }

    public function get(string $fields = ''): array
    {
        if ($fields) {
            $this->fields($fields);
        }

        return $this->queryObject->get_posts();
    }

    public function setArgument(string $key, int|string|array $value): static
    {
        $this->queryObject->set($key, $value);

        return $this;
    }

    public function fields(string $fields): static
    {
        return $this->setArgument('fields', $fields);
    }

    public function type(array | string $type): static
    {
        return $this->setArgument('post_type', $type);
    }

    public function status(array | string $status): static
    {
        return $this->setArgument('post_status', $status);
    }

    public function limit(int $limit): static
    {
        return $this->setArgument('posts_per_page', $limit);
    }
}
