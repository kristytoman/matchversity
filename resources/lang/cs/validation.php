<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain default error messages used by
    | validator class. Some of these rules have multiple versions such
    | as size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute musí být přijat.',
    'active_url' => ':attribute není platná URL adresa.',
    'after' => ':attribute musí být po datu :date.',
    'after_or_equal' => ':attribute musí být od data :date.',
    'alpha' => ':attribute může obsahovat pouze písmena.',
    'alpha_dash' => ':attribute může obsahovat pouze písmena, čísla, pomlčky a podtržítka.',
    'alpha_num' => ':attribute může obsahovat pouze písmena a čísla.',
    'array' => ':attribute musí být pole.',
    'before' => ':attribute musí být před datem :date.',
    'before_or_equal' => ':attribute musí být do data :date.',
    'between' => [
        'numeric' => ':attribute musí být mezi :min a :max.',
        'file' => ':attribute musí být mezi :min a :max kilobyty.',
        'string' => ':attribute musí být mezi :min a :max znaky.',
        'array' => ':attribute musí mít mezi :min a :max položkami.',
    ],
    'boolean' => ':attribute musí být pravda nebo nepravda.',
    'confirmed' => 'Potvrzení :attribute nesedí.',
    'date' => ':attribute není platné datum.',
    'date_equals' => ':attribute musí být :date.',
    'date_format' => ':attribute není typu :format.',
    'different' => ':attribute a :other musí být odlišné.',
    'digits' => ':attribute musí být :digits číslic.',
    'digits_between' => ':attribute musí být mezi :min a :max číslicemi.',
    'dimensions' => ':attribute má neplatné dimenze obrázku.',
    'distinct' => ':attribute má duplicitní hodnoty.',
    'email' => ':attribute musí být platná emailová adresa.',
    'ends_with' => ':attribute musí končit jednou z následujících hodnot: :values.',
    'exists' => 'Vybraný :attribute je neplatný.',
    'file' => ':attribute musí být soubor.',
    'filled' => ':attribute musí mít přiřazenou hodnotu.',
    'gt' => [
        'numeric' => ':attribute musí být větší než :value.',
        'file' => ':attribute musí být větší než :value kilobytů.',
        'string' => ':attribute musí být větší než :value znaků.',
        'array' => ':attribute musí mít více než :value položek.',
    ],
    'gte' => [
        'numeric' => ':attribute musí být alespoň :value.',
        'file' => ':attribute musí být alespoň :value kilobytů.',
        'string' => ':attribute musí být alespoň :value znaků.',
        'array' => ':attribute must have :value položek nebo více.',
    ],
    'image' => ':attribute musí být obrázek.',
    'in' => 'Vybraný :attribute je neplatný.',
    'in_array' => ':attribute není v :other.',
    'integer' => ':attribute musí být celé číslo.',
    'ip' => ':attribute musí být validní IP adresu.',
    'ipv4' => ':attribute musí být validní IPv4 adresu.',
    'ipv6' => ':attribute musí být validní IPv6 adresu.',
    'json' => ':attribute musí být validní JSON.',
    'lt' => [
        'numeric' => ':attribute musí být méně než :value velký.',
        'file' => ':attribute musí být méně než :value kilobytů velký.',
        'string' => ':attribute musí být méně než :value znaků velký.',
        'array' => ':attribute musí mít méně než :value položek.',
    ],
    'lte' => [
        'numeric' => ':attribute musí být nejméně :value velký.',
        'file' => ':attribute musí být nejméně :value kilobytů velký.',
        'string' => ':attribute musí být nejméně :value znaků velký.',
        'array' => ':attribute musí mít nejméně :value položek.',
    ],
    'max' => [
        'numeric' => ':attribute nemůže být větší než :max.',
        'file' => ':attribute nemůže být větší než :max kilobytů.',
        'string' => ':attribute nemůže být větší než :max znaků.',
        'array' => ':attribute nemůže mít více než :max položek.',
    ],
    'mimes' => ':attribute musí být soubor :values.',
    'mimetypes' => ':attribute musí být soubor :values.',
    'min' => [
        'numeric' => ':attribute musí být alespoň :min.',
        'file' => ':attribute musí mít alespoň :min kilobytů.',
        'string' => ':attribute musí mít alespoň :min znaků.',
        'array' => ':attribute musí mít alespoň :min položek.',
    ],
    'not_in' => 'Vybraný :attribute je neplatný.',
    'not_regex' => ':attribute formát je neplatný.',
    'numeric' => ':attribute musí být číslo.',
    'password' => 'Heslo je neplatné.',
    'present' => ':attribute je povinný.',
    'regex' => ':attribute je neplatný.',
    'required' => ':attribute je povinný.',
    'required_if' => ':attribute je povinný, pokud :other je :value.',
    'required_unless' => ':attribute je nepovinný, pokud :other je :values.',
    'required_with' => ':attribute je povinný, pokud obsahuje :values.',
    'required_with_all' => ':attribute je povinný, pokud obsahuje :values.',
    'required_without' => ':attribute je povinný, pokud neobsahuje :values.',
    'required_without_all' => ':attribute je povinný, pokud neobsahuje žádnou :values.',
    'same' => ':attribute a :other musí sedět.',
    'size' => [
        'numeric' => ':attribute musí být :size.',
        'file' => ':attribute musí mít :size kilobytů.',
        'string' => ':attribute musí mít :size znaků.',
        'array' => ':attribute musí obsahovat :size položek.',
    ],
    'starts_with' => ':attribute musí začínat s :values.',
    'string' => ':attribute musí být text.',
    'timezone' => ':attribute musí být validní časová zóna.',
    'unique' => ':attribute je již zabraná.',
    'uploaded' => ':attribute se nepodařilo nahrát.',
    'url' => ':attribute formát je neplatný.',
    'uuid' => ':attribute musí být validní UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];