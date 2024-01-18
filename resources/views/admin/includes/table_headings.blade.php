@php
function table_headings($th=[]){
    $i = 1;
    $html = '<thead class="cart__table--header"><tr class="cart__table--header__items">';
    foreach ($th as $heading) {
        $strx = explode(":", $heading);
        $cls = '';
        if(count($strx) > 1){ $heading = $strx[0]; $cls = $strx[1]; }
        $html .= '<th class="cart__table--header__list '.$cls.' th__'.$i.'">'.$heading.'</th>';
        $i++;
    }
    $html .= '</tr></thead>';
    return $html;
}
@endphp