<?php
function setActive($value) {
    return request()->routeIs($value)? 'active':'';
}
