<?php
namespace paydoo_test_lib\Filters;
use paydoo_test_lib\Filters\ValueObjectInterface;

class BasicFilter {
    public $from;
    public $to;
    public $previousFrom;
    public $previousTo;
    public $products;
    
    public function __construct(\DateTimeImmutable $from, \DateTimeImmutable $to
            , array $products) 
    {
        if($from > $to)
            throw new \Exception ('From must be smaller than to');

        $from_y = (int)$from->format('Y');
        $from_m = (int)$from->format('m');
        $from_d = (int)$from->format('d');
        $to_y = (int)$to->format('Y');
        $to_m = (int)$to->format('m');
        $to_d = (int)$to->format('d');
        $int = new \DateInterval('P1D');
        $next = $to->add($int);
        $next_y = (int)$next->format('Y');
        $next_m = (int)$next->format('m');
        $next_d = (int)$next->format('d');
        
        // Prev month
        if ($from_y == $to_y && $from_m == $to_m && $from_d == 1 && $next_d == 1 && $next_m == ($to_m + 1)) {
            $intervalMonth = new \DateInterval('P1M');
            $intervalDay = new \DateInterval('P1D');
            $previousFrom = $from->sub($intervalMonth);
            $previousTo = $from->sub($intervalDay);
        // Prev year
        } elseif ($from_y == $to_y && $from_m == 1 && $from_d == 1 && $to_m == 12 && $to_d == 31) {
            $intervalYear = new \DateInterval('P1Y');
            $previousFrom = $from->sub($intervalYear);
            $previousTo = $to->sub($intervalYear);
        // Prev date
        } else {
            $intervalDays = $from->diff($to);
            $intervalDays->d += 1;
            $intervalDays->h = 0;
            $intervalDays->i = 0;
            $intervalDays->s = 0;

            $previousFrom = $from->sub($intervalDays);
            $previousTo = $to->sub($intervalDays);
        }
        
        $this->from = $from->setTime(0, 0, 0);
        $this->to = $to->setTime(23, 59, 59);
        $this->previousFrom = $previousFrom->setTime(0, 0, 0);
        $this->previousTo = $previousTo->setTime(23, 59, 59);

        $this->products = [];
        
        foreach ($products as $product) {
            if(Product::checkValue($product))
                $this->products[] = $product;
            else
                throw new \Exception("'$product' is not a valid product");
        }
    }
}