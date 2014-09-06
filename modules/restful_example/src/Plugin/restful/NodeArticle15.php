<?php
/**
 * @file
 * Contain Drupal\restful_example\Plugin\Restful\NodeArticle15
 */

namespace Drupal\restful_example\Plugin\Restful;

use Drupal\restful\Base\RestfulEntityBaseNode;

/**
 * @Restful(
 *  id = "node-article-1.5",
 *  label = @Translation('Article'),
 *  description = @Translation('Export the article content type with "cookie" authentication.),
 *  resource = 'articles',
 *  name = 'articles__1_5',
 *  entity_type = 'node',
 *  bundle = 'articles',
 *  authentication_types = TRUE,
 *  authentication_optional = TRUE,
 *  minor_version = 5
 * )
 */
class NodeArticle15 extends RestfulEntityBaseNode {

  /**
   * Overrides RestfulExampleArticlesResource::getPublicFields().
   */
  public function getPublicFields() {
    $public_fields = parent::getPublicFields();

    $public_fields['body'] = array(
      'property' => 'body',
      'sub_property' => 'value',
    );

    $public_fields['tags'] = array(
      'property' => 'field_tags',
      'resource' => array(
        'tags' => 'tags',
      ),
    );

    $public_fields['image'] = array(
      'property' => 'field_image',
      'process_callback' => array($this, 'imageProcess'),
    );

    return $public_fields;
  }

  /**
   * Process callback, Remove Drupal specific items from the image array.
   *
   * @param array $value
   *   The image array.
   *
   * @return array
   *   A cleaned image array.
   */
  protected function imageProcess($value) {
    return array(
      'id' => $value['fid'],
      'self' => file_create_url($value['uri']),
      'filemime' => $value['filemime'],
      'filesize' => $value['filesize'],
      'width' => $value['width'],
      'height' => $value['height'],
    );
  }
}