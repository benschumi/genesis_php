<?php
/*
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @license     http://opensource.org/licenses/MIT The MIT License
 */
namespace Genesis\API\Request\Base\Financial\PayByVouchers;

/**
 * Class ASale
 *
 * Base Abstract Class for PayByVouchers
 *
 * @package Genesis\API\Request\Base\Financial\PayByVouchers
 *
 * @method $this setCardType($value) Set Card type for the voucher - can be ’virtual’ or ’physical’ only
 * @method $this setRedeemType($value) Set Redeem type for the voucher - can be ’stored’ or ’instant’ only
 */
abstract class ASale extends \Genesis\API\Request\Base\Financial\Cards\Synchronous\AbstractTransaction
{
    /**
     * Card type for the voucher - can be ’virtual’ or ’physical’ only
     *
     * @var string
     */
    protected $card_type;

    /**
     * Redeem type for the voucher - can be ’stored’ or ’instant’ only
     *
     * @var string
     */
    protected $redeem_type;

    /**
     * Return additional request attributes
     * @return array
     */
    protected function getRequestTreeStructure()
    {
        $treeStructure = parent::getRequestTreeStructure();

        return array_merge(
            $treeStructure,
            array(
                'card_type'   => $this->card_type,
                'redeem_type' => $this->redeem_type
            )
        );
    }
}