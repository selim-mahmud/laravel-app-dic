<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 5/04/2017
 * Time: 7:26 PM
 */

/**
 * returns schema code for star rating on google search result
 *
 * @param float $ratingValue
 * @param int $ratingCount
 * @param int $maxValue
 * @param int $minValue
 *
 * @return string
 */
function getRatingSchemaCodeInJson($ratingValue, $ratingCount, $maxValue = 5, $minValue = 0) {
    return <<<EOT
	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "WebPage",
			"aggregateRating": {
			    "@type": "AggregateRating",
			    "ratingValue": "{$ratingValue}",
			    "bestRating": "{$maxValue}",
			    "worstRating": "{$minValue}",
			    "ratingCount": "{$ratingCount}"
			  }
		}
	</script>
EOT;
}