<?php

/**
 * @file
 * Contains \Drupal\restful\http\HttpHeaderInterface
 */

namespace Drupal\restful\http;

interface HttpHeaderInterface {

  /**
   * Creates a header object from the key and value strings.
   *
   * @param string $key
   *   The header name.
   * @param string $value
   *   The header value.
   *
   * @return HttpHeaderInterface
   *   The parsed header.
   */
  public static function create($key, $value);

  /**
   * Gets the values of the header.
   *
   * @return array
   *   The values for this header.
   */
  public function get();

  /**
   * Gets the contents of the header.
   *
   * @return string
   *   The header value as a string.
   */
  public function contents();

  /**
   * Sets the values.
   *
   * @param array $values
   *   A numeric array containing all the values for the given header.
   */
  public function set($values);

  /**
   * Appends a value into a header.
   *
   * @param string $value
   *   The string value to append.
   */
  public function append($value);

  /**
   * Gets the header id.
   *
   * @return string
   *   The header ID.
   */
  public function getId();

}
