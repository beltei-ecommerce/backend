<?php

namespace App\Utils;

class Pagination
{
  /**
   * Calculate the offset for pagination.
   *
   * @param int $page
   * @param int $limit
   * @return int
   */
  public static function offset($page, $limit): int
  {
    $page = (int) $page;
    $limit = (int) $limit;

    return ($page - 1) * $limit;
  }
}
