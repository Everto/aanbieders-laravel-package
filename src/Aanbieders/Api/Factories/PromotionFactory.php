<?php namespace Aanbieders\Api\Factories;


use Aanbieders\Api\Models\Promotion;

class PromotionFactory extends BaseFactory {

    public function createPromotions(array $promotionsInfo)
    {
        $promotions = array();
        foreach( $promotionsInfo as $item ) {
            array_push( $promotions, $this->createPromotion($item) );
        }

        return $promotions;
    }

    public function createPromotion($promotionInfo)
    {
        $promotion = new Promotion();
        $promotion->id = $this->getAttribute('promotion_id', $promotionInfo, 0);
        $promotion->start_date = $this->getAttribute('start_date', $promotionInfo, '');
        $promotion->end_date = $this->getAttribute('end_date', $promotionInfo, '');

        $promotion->isAcquisitionOffer = $this->getAttribute('acquisition_offer', $promotionInfo, false);
        $promotion->isRetentionOffer = $this->getAttribute('retention_offer', $promotionInfo, false);
        $promotion->isPermanent = $this->getAttribute('is_permanent', $promotionInfo, false);

        $promotion->texts = $this->getAttribute('texts', $promotionInfo, array());
        $promotion->links = $this->getAttribute('links', $promotionInfo, array());
        $promotion->specifications = $this->getAttribute('specifications', $promotionInfo, array());

        $promotion->incompatible_with = $this->getAttribute('incompatible_with', $promotionInfo, array());

        return $promotion;
    }

}