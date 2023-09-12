<?php
class Helper
{
    static function clearString($str)
    {
        return trim(strip_tags($str));
    }
    static function clearInt($str)
    {
        return (int) $str;
    }

    static function printSelectOptions($key, $options = array())
    {
        if ($options) {
            foreach ($options as $option) { ?>
                <option value="<?= $option['id']; ?>" <?= ($key ==
                      $option['id']) ? 'selected' : ''; ?>><?= $option['value']; ?></option>
            <?php }
        }

    }
}