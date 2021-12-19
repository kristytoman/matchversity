<?php

namespace App\Models\Validation;

class ForeignCourseValidator extends DataValidator
{
    /**
     * Validate the input data.
     *
     * @return bool
     */
    public function validate()
    {
        if (empty($this->data)) {
            return $this->result("Missing foreign course name.");
        }
        $this->correctText();
        if (empty($this->data)) {
            return $this->result("Missing foreign course name.");
        }
        return $this->result("");
    }

    /**
     * Change text casing and spacing.
     * @return void
     */
    private function correctText()
    {
        $this->data = $this->trimSpaces();
        $this->toFirstUpperCase();
        $this->data = $this->switchBackToLower();
        $this->data = $this->switchToAllUpper();
    }

    /**
     * Set on space between words.
     * @return string
     */
    private function trimSpaces()
    {
        return preg_replace(
                '/^[\pZ\pC]+|[\pZ\pC]+$/u',
                '',
                preg_replace('/\s+/', ' ', $this->data) ?? ""
            ) ?? "";
    }

    /**
     * Set first letter of the word to upper.
     * @return void
     */
    private function toFirstUpperCase()
    {
        $this->data = mb_strtolower($this->data, 'UTF-8');
        $this->data = ucwords($this->data, " \t\r\n\f\v(\"'.-\/&");
    }

    /**
     * Switch short words to lower case.
     * @return string
     */
    private function switchBackToLower()
    {
        $words = array('A', 'An', 'The', 'And', 'Of', 'But', 'Or', 'For', 'Nor', 'With',
            'On', 'In', 'At', 'To', 'From', 'By', '\'S', 'As');
        $regex = '/\b(' . implode('|', $words) . ')\b/i';
        if ($first = strstr($this->data, " ", true)) {
            $this->data = $first . preg_replace_callback($regex, function ($matches) {
                    return mb_strtolower($matches[1], 'UTF-8');
                }, strstr($this->data, " ") ?: "");
        }
        return $this->data;
    }

    /**
     * Switch default words to all upper case.
     * @return string
     */
    private function switchToAllUpper()
    {
        $words = array('Ii', 'Iii', 'Iv', 'Vi', 'Vii', 'Viii', 'Ix', 'Xi', '3d', 'Net', 'Eu');
        $regex = '/\b(' . implode('|', $words) . ')\b/i';
        $this->data = preg_replace_callback($regex, function ($matches) {
                return mb_strtoupper($matches[1], 'UTF-8');
            }, $this->data) ?? "";
        return $this->data;
    }
}
