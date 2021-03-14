<?php

namespace App\Models\Validation;

use App\Models\Validation\DataValidator;

class ForeignCourseValidator extends DataValidator
{
    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Missing foreign course name.");
        }
        $this->toFirstUpperCase();
        if (empty($this->data)) {
            return $this->result("Missing foreign course name.");
        }
        return $this->result("");
    }

    public function toFirstUpperCase()
    {
        $this->data = mb_strtolower($this->data, 'UTF-8');
        $this->data = preg_replace('/^[\pZ\pC]+|[\pZ\pC]+$/u', '', preg_replace('/\s+/', ' ', $this->data));
        $this->data = ucwords($this->data, " \t\r\n\f\v(\"'.-");
        $words = array('A', 'An', 'The', 'And', 'Of', 'But', 'Or', 'For', 'Nor', 'With', 
                       'On', 'In', 'At', 'To', 'From', 'By', '\'S', 'As');
        $regex = '/\b(' . implode( '|', $words) . ')\b/i';
        if ($first = strstr($this->data, " ", true)) {
            $this->data = $first . preg_replace_callback($regex, function($matches) {
                return mb_strtolower($matches[1], 'UTF-8');
            }, strstr($this->data, " "));
        }
        $words = array('Ii','Iii','Iv','Vi','Vii', 'Viii','Ix','Xi','3d','Net', 'Eu');
        $regex = '/\b(' . implode( '|', $words) . ')\b/i';
        $this->data = preg_replace_callback($regex, function($matches) {
            return mb_strtoupper($matches[1], 'UTF-8');
        }, $this->data);
    } 
}