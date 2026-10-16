<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\GeoMaps;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Location Service Maps V2** service.
 * @method \R2Offload\Vendor\Aws\Result getGlyphs(array $args = [])
 * @phpstan-method \Aws\Result getGlyphs(array{FontStack?: string, FontUnicodeRange?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getGlyphsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGlyphsAsync(array{FontStack?: string, FontUnicodeRange?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSprites(array $args = [])
 * @phpstan-method \Aws\Result getSprites(array{
 *     FileName?: string,
 *     Style?: 'Hybrid'|'Monochrome'|'Satellite'|'Standard',
 *     ColorScheme?: 'Dark'|'Light',
 *     Variant?: 'Default',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSpritesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSpritesAsync(array{
 *     FileName?: string,
 *     Style?: 'Hybrid'|'Monochrome'|'Satellite'|'Standard',
 *     ColorScheme?: 'Dark'|'Light',
 *     Variant?: 'Default',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStaticMap(array $args = [])
 * @phpstan-method \Aws\Result getStaticMap(array{
 *     BoundingBox?: string,
 *     BoundedPositions?: string,
 *     Center?: string,
 *     ColorScheme?: 'Dark'|'Light',
 *     CompactOverlay?: string,
 *     CropLabels?: bool,
 *     GeoJsonOverlay?: string,
 *     Height?: int,
 *     Key?: string,
 *     LabelSize?: 'Large'|'Small',
 *     Language?: string,
 *     Padding?: int,
 *     PoliticalView?: string,
 *     PointsOfInterests?: 'Disabled'|'Enabled',
 *     Radius?: int,
 *     FileName?: string,
 *     ScaleBarUnit?: 'Kilometers'|'KilometersMiles'|'Miles'|'MilesKilometers',
 *     Style?: 'Satellite'|'Standard',
 *     Width?: int,
 *     Zoom?: float,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStaticMapAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStaticMapAsync(array{
 *     BoundingBox?: string,
 *     BoundedPositions?: string,
 *     Center?: string,
 *     ColorScheme?: 'Dark'|'Light',
 *     CompactOverlay?: string,
 *     CropLabels?: bool,
 *     GeoJsonOverlay?: string,
 *     Height?: int,
 *     Key?: string,
 *     LabelSize?: 'Large'|'Small',
 *     Language?: string,
 *     Padding?: int,
 *     PoliticalView?: string,
 *     PointsOfInterests?: 'Disabled'|'Enabled',
 *     Radius?: int,
 *     FileName?: string,
 *     ScaleBarUnit?: 'Kilometers'|'KilometersMiles'|'Miles'|'MilesKilometers',
 *     Style?: 'Satellite'|'Standard',
 *     Width?: int,
 *     Zoom?: float,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStyleDescriptor(array $args = [])
 * @phpstan-method \Aws\Result getStyleDescriptor(array{
 *     Style?: 'Hybrid'|'Monochrome'|'Satellite'|'Standard',
 *     ColorScheme?: 'Dark'|'Light',
 *     PoliticalView?: string,
 *     Terrain?: 'Hillshade'|'Terrain3D',
 *     ContourDensity?: 'High'|'Low'|'Medium',
 *     Traffic?: 'All'|'Congestion',
 *     TravelModes?: list<'Transit'|'Truck'>,
 *     Buildings?: 'Buildings3D',
 *     PoiDensity?: 'Default'|'Dense'|'Off'|'Sparse'|'VeryDense'|'VerySparse',
 *     PoiCategories?: list<'Accommodations'|'BusinessAndServices'|'Entertainment'|'FacilitiesAndBuildings'|'FoodAndDrink'|'LeisureAndOutdoor'|'Shopping'|'SightsAndMuseums'|'Transportation'>,
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStyleDescriptorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStyleDescriptorAsync(array{
 *     Style?: 'Hybrid'|'Monochrome'|'Satellite'|'Standard',
 *     ColorScheme?: 'Dark'|'Light',
 *     PoliticalView?: string,
 *     Terrain?: 'Hillshade'|'Terrain3D',
 *     ContourDensity?: 'High'|'Low'|'Medium',
 *     Traffic?: 'All'|'Congestion',
 *     TravelModes?: list<'Transit'|'Truck'>,
 *     Buildings?: 'Buildings3D',
 *     PoiDensity?: 'Default'|'Dense'|'Off'|'Sparse'|'VeryDense'|'VerySparse',
 *     PoiCategories?: list<'Accommodations'|'BusinessAndServices'|'Entertainment'|'FacilitiesAndBuildings'|'FoodAndDrink'|'LeisureAndOutdoor'|'Shopping'|'SightsAndMuseums'|'Transportation'>,
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTile(array $args = [])
 * @phpstan-method \Aws\Result getTile(array{
 *     AdditionalFeatures?: list<'ContourLines'|'Hillshade'|'Logistics'|'Transit'>,
 *     Tileset?: string,
 *     Z?: string,
 *     X?: string,
 *     Y?: string,
 *     Key?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTileAsync(array{
 *     AdditionalFeatures?: list<'ContourLines'|'Hillshade'|'Logistics'|'Transit'>,
 *     Tileset?: string,
 *     Z?: string,
 *     X?: string,
 *     Y?: string,
 *     Key?: string,
 *     ...,
 * } $args = [])
 */
class GeoMapsClient extends AwsClient {}
