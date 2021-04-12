<?php
/**
 * This file is part of the Cloudinary PHP package.
 *
 * (c) Cloudinary
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cloudinary\Api\Admin;

use Cloudinary\Api\ApiClient;
use Cloudinary\Api\ApiResponse;
use Cloudinary\Api\ApiUtils;
use Cloudinary\Api\Exception\ApiError;
use Cloudinary\ArrayUtils;
use Cloudinary\Asset\AssetType;
use Cloudinary\Asset\DeliveryType;
use Cloudinary\Asset\ModerationStatus;

/**
 * Enables you to manage the assets in your account or cloud.
 *
 * **Learn more**: <a
 * href=https://cloudinary.com/documentation/admin_api#resources target="_blank">
 * Resources method - Admin API</a>
 *
 * @property ApiClient $apiClient Defined in AdminApi class.
 *
 * @api
 */
trait AssetsTrait
{
    /**
     * Lists available asset types.
     *
     * @return ApiResponse
     */
    public function resourceTypes()
    {
        return $this->apiClient->get(ApiEndPoint::RESOURCES);
    }

    /**
     * Lists all uploaded assets filtered by any specified options.
     *
     * @param array $options The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#get_resources target="_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @see https://cloudinary.com/documentation/admin_api#get_resources
     */
    public function resources($options = [])
    {
        $assetType = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $uri       = [ApiEndPoint::RESOURCES, $assetType];
        ArrayUtils::appendNonEmpty($uri, ArrayUtils::get($options, DeliveryType::KEY));

        $params = ArrayUtils::whitelist(
            $options,
            [
                'next_cursor',
                'max_results',
                'prefix',
                'tags',
                'context',
                'moderations',
                'direction',
                'start_at',
            ]
        );

        return $this->apiClient->get($uri, $params);
    }

    /**
     * Lists assets with the specified tag.
     *
     * This method does not return matching deleted assets, even if they have been backed up.
     *
     * @param string $tag     The tag value.
     * @param array  $options The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#get_resources_by_tag target="_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @see https://cloudinary.com/documentation/admin_api#get_resources_by_tag
     */
    public function resourcesByTag($tag, $options = [])
    {
        $assetType = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $uri       = [ApiEndPoint::RESOURCES, $assetType, 'tags', $tag];
        $params    = ArrayUtils::whitelist(
            $options,
            ['next_cursor', 'max_results', 'tags', 'context', 'moderations', 'direction']
        );

        return $this->apiClient->get($uri, $params);
    }

    /**
     * Lists assets with the specified contextual metadata.
     *
     * This method does not return matching deleted assets, even if they have been backed up.
     *
     * @param string $key     Only assets with this context key are returned.
     * @param string $value   Only assets with this context value for the specified context key are returned.
     *                        If this parameter is not provided, all assets with the specified context key are returned,
     *                        regardless of the key value.
     * @param array  $options The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#get_resources_by_context target="_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @see https://cloudinary.com/documentation/admin_api#get_resources_by_context
     */
    public function resourcesByContext($key, $value = null, $options = [])
    {
        $assetType       = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $uri             = [ApiEndPoint::RESOURCES, $assetType, 'context'];
        $params          = ArrayUtils::whitelist(
            $options,
            ['next_cursor', 'max_results', 'tags', 'context', 'moderations', 'direction']
        );
        $params['key']   = $key;
        $params['value'] = $value;

        return $this->apiClient->get($uri, $params);
    }

    /**
     * Lists assets currently in the specified moderation queue and status.
     *
     * @param string $kind    Type of image moderation queue to list.
     *                        Valid values:  "manual", "webpurify", "aws_rek", or "metascan".
     * @param string $status  Only assets with this moderation status will be returned.
     *                        Valid values: "pending", "approved", "rejected".
     * @param array  $options The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#get_resources_in_moderation_queues target="_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @see https://cloudinary.com/documentation/admin_api#get_resources_in_moderation_queues
     */
    public function resourcesByModeration($kind, $status, $options = [])
    {
        $assetType = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $uri       = [ApiEndPoint::RESOURCES, $assetType, 'moderations', $kind, $status];

        $params = ArrayUtils::whitelist(
            $options,
            ['next_cursor', 'max_results', 'tags', 'context', 'moderations', 'direction']
        );

        return $this->apiClient->get($uri, $params);
    }

    /**
     * Lists assets with the specified public IDs.
     *
     * @param string|array $publicIds The requested public_ids (up to 100).
     * @param array        $options   The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#get_resources target="_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @see https://cloudinary.com/documentation/admin_api#get_resources
     */
    public function resourcesByIds($publicIds, $options = [])
    {
        $assetType = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $type      = ArrayUtils::get($options, DeliveryType::KEY, DeliveryType::UPLOAD);
        $uri       = [ApiEndPoint::RESOURCES, $assetType, $type];

        $params               = ArrayUtils::whitelist($options, ['public_ids', 'tags', 'moderations', 'context']);
        $params['public_ids'] = $publicIds;

        return $this->apiClient->get($uri, $params);
    }

    /**
     * Returns the details of the specified asset and all its derived resources.
     *
     *
     * Note that if you only need details about the original resource,
     * you can also use the Uploader::upload or Uploader::explicit methods, which return the same information and
     * are not rate limited.
     *
     * @param string $publicId The public ID of the asset.
     * @param array  $options  The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#get_the_details_of_a_single_resource target="_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @see https://cloudinary.com/documentation/admin_api#get_the_details_of_a_single_resource
     */
    public function resource($publicId, $options = [])
    {
        $assetType = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $type      = ArrayUtils::get($options, DeliveryType::KEY, DeliveryType::UPLOAD);
        $uri       = [ApiEndPoint::RESOURCES, $assetType, $type, $publicId];

        $params = ArrayUtils::whitelist(
            $options,
            [
                'exif',
                'colors',
                'faces',
                'quality_analysis',
                'image_metadata',
                'phash',
                'pages',
                'coordinates',
                'max_results',
                'accessibility_analysis',
            ]
        );

        return $this->apiClient->get($uri, $params);
    }

    /**
     * Reverts to the latest backed up version of the specified deleted assets.
     *
     *
     * @param string|array $publicIds The public IDs of the backed up assets to restore. They can be existing or
     * deleted assets.
     * @param array        $options   The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#restore_resources target="f_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @see https://cloudinary.com/documentation/admin_api#restore_resources
     */
    public function restore($publicIds, $options = [])
    {
        $assetType = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $type      = ArrayUtils::get($options, DeliveryType::KEY, DeliveryType::UPLOAD);
        $uri       = [ApiEndPoint::RESOURCES, $assetType, $type, 'restore'];

        $params = array_merge($options, ['public_ids' => $publicIds]);

        return $this->apiClient->postForm($uri, $params);
    }

    /**
     * Updates details of an existing asset.
     *
     * Update one or more of the attributes associated with a specified asset. Note that you can also update
     * most attributes of an existing asset using the Uploader::explicit method, which is not rate limited.
     *
     * @param string|array $publicId The public ID of the asset to update.
     * @param array        $options  The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#update_details_of_an_existing_resource target="_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @see https://cloudinary.com/documentation/admin_api#update_details_of_an_existing_resource
     */
    public function update($publicId, $options = [])
    {
        $assetType = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $type      = ArrayUtils::get($options, DeliveryType::KEY, DeliveryType::UPLOAD);
        $uri       = [ApiEndPoint::RESOURCES, $assetType, $type, $publicId];

        $primitive_options = ArrayUtils::whitelist(
            $options,
            [
                ModerationStatus::KEY,
                'raw_convert',
                'ocr',
                'categorization',
                'detection',
                'similarity_search',
                'auto_tagging',
                'background_removal',
                'quality_override',
                'notification_url',
            ]
        );

        $array_options = [
            'tags'               => ApiUtils::serializeSimpleApiParam(ArrayUtils::get($options, 'tags')),
            'context'            => ApiUtils::serializeContext(ArrayUtils::get($options, 'context')),
            'face_coordinates'   => ApiUtils::serializeArrayOfArrays(ArrayUtils::get($options, 'face_coordinates')),
            'custom_coordinates' => ApiUtils::serializeArrayOfArrays(ArrayUtils::get($options, 'custom_coordinates')),
            'access_control'     => ApiUtils::serializeJson(ArrayUtils::get($options, 'access_control')),
        ];

        $update_options = array_merge($primitive_options, $array_options);

        return $this->apiClient->postForm($uri, $update_options);
    }

    /**
     * Deletes the specified assets.
     *
     * @param string|array $publicIds The public IDs of the assets to delete (up to 100).
     * @param array        $options   The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#sdelete_resources target="_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @throws ApiError
     *
     * @see https://cloudinary.com/documentation/admin_api#delete_resources
     */
    public function deleteResources($publicIds, $options = [])
    {
        $assetType = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $type      = ArrayUtils::get($options, DeliveryType::KEY, DeliveryType::UPLOAD);
        $uri       = [ApiEndPoint::RESOURCES, $assetType, $type];

        $params = $this->prepareDeleteResourceParams($options, ['public_ids' => $publicIds]);

        return $this->apiClient->delete($uri, $params);
    }

    /**
     * Deletes assets by prefix.
     *
     * Delete up to 1000 original assets, along with their derived resources, where the public ID starts with the
     * specified prefix.
     *
     * @param string $prefix  The Public ID prefix.
     * @param array  $options The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#delete_resources target="_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @throws ApiError
     *
     * @see https://cloudinary.com/documentation/admin_api#delete_resources
     */
    public function deleteResourcesByPrefix($prefix, $options = [])
    {
        $assetType = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $type      = ArrayUtils::get($options, DeliveryType::KEY, DeliveryType::UPLOAD);
        $uri       = [ApiEndPoint::RESOURCES, $assetType, $type];

        $params = $this->prepareDeleteResourceParams($options, ['prefix' => $prefix]);

        return $this->apiClient->delete($uri, $params);
    }

    /**
     * Deletes all assets of the specified asset and delivery type, including their derived resources.
     *
     * Supports deleting up to a maximum of 1000 original assets in a single call.
     *
     * @param array $options The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#delete_resources target="_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @throws ApiError
     *
     * https://cloudinary.com/documentation/admin_api#delete_resources
     */
    public function deleteAllResources($options = [])
    {
        $assetType = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $type      = ArrayUtils::get($options, DeliveryType::KEY, DeliveryType::UPLOAD);
        $uri       = [ApiEndPoint::RESOURCES, $assetType, $type];
        $params    = $this->prepareDeleteResourceParams($options, ['all' => true]);

        return $this->apiClient->delete($uri, $params);
    }

    /**
     * Deletes assets with the specified tag, including their derived resources.
     *
     * Supports deleting up to a maximum of 1000 original assets in a single call.
     *
     * @param string $tag     The tag value of the assets to delete.
     * @param array  $options The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#delete_resources_by_tags target="_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @throws ApiError
     *
     * @see https://cloudinary.com/documentation/admin_api#delete_resources_by_tags
     */
    public function deleteResourcesByTag($tag, $options = [])
    {
        $assetType = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $uri       = [ApiEndPoint::RESOURCES, $assetType, 'tags', $tag];
        $params    = $this->prepareDeleteResourceParams($options);

        return $this->apiClient->delete($uri, $params);
    }

    /**
     * Deletes the specified derived resources by derived resource ID.
     *
     * The derived resource IDs for a particular original asset are returned when calling the `resource` method to
     * return the details of a single asset.
     *
     * @param string|array $derived_resource_ids The derived resource IDs (up to 100 ids).
     *
     * @return ApiResponse
     *
     * @throws ApiError
     *
     * @see https://cloudinary.com/documentation/admin_api##delete_resources
     */
    public function deleteDerivedResources($derived_resource_ids)
    {
        $uri    = ApiEndPoint::DERIVED_RESOURCES;
        $params = ['derived_resource_ids' => $derived_resource_ids];

        return $this->apiClient->delete($uri, $params);
    }

    /**
     * Deletes derived resources identified by transformation and public_ids.
     *
     * @param string|array $publicIds       The public IDs for which you want to delete derived resources.
     * @param string|array $transformations The transformation(s) associated with the derived resources to delete.
     * @param array        $options         The optional parameters. See the
     * <a href=https://cloudinary.com/documentation/admin_api#resources target="_blank"> Admin API</a> documentation.
     *
     * @return ApiResponse
     *
     * @throws ApiError
     */
    public function deleteDerivedByTransformation($publicIds, $transformations = [], $options = [])
    {
        $assetType = ArrayUtils::get($options, AssetType::KEY, AssetType::IMAGE);
        $type      = ArrayUtils::get($options, DeliveryType::KEY, DeliveryType::UPLOAD);
        $uri       = [ApiEndPoint::RESOURCES, $assetType, $type];

        $params                    = [
            'public_ids'    => ArrayUtils::build($publicIds),
            'keep_original' => true,
        ];
        $params['transformations'] = ApiUtils::serializeAssetTransformations($transformations);
        $params                    = array_merge($params, ArrayUtils::whitelist($options, ['invalidate']));

        return $this->apiClient->delete($uri, $params);
    }

    /**
     * Prepares optional parameters for delete asset API calls.
     *
     * @param array $options Additional options.
     * @param array $params  The parameters passed to the API.
     *
     * @return array    Updated parameters
     *
     * @internal
     */
    protected function prepareDeleteResourceParams($options, $params = [])
    {
        $filtered = ArrayUtils::whitelist($options, ['keep_original', 'next_cursor', 'invalidate']);
        if (isset($options['transformations'])) {
            $filtered['transformations'] = ApiUtils::serializeAssetTransformations($options['transformations']);
        }

        return array_merge($params, $filtered);
    }
}