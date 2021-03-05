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
        return $this->result("");
    }

    public function toFirstUpperCase()
    {
        $this->data = trim(preg_replace('/\s+/', ' ', $this->data));
        $this->data = strtolower($this->data);
        $this->data = ucwords($this->data, " \t\r\n\f\v(\"'.-");
        $words = array('A', 'An', 'The', 'And', 'Of', 'But', 'Or', 'For', 'Nor', 'With', 'On', 'In', 'At', 'To', 'From', 'By', '\'S');
        $regex = '/\b(' . implode( '|', $words) . ')\b/i';
        if ($first = strstr($this->data, " ", true)) {
            $this->data = $first . preg_replace_callback($regex, function($matches) {
                return strtolower($matches[1]);
            }, strstr($this->data, " "));
        }
    } 
}