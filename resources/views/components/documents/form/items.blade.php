<div class="row document-item-body">
    <div class="col-sm-12 p-0" style="table-layout: fixed;">
        @if (!$hideEditItemColumns)
            <x-edit-item-columns :type="$type" />
        @endif

        <div class="table-responsive overflow-x-scroll overflow-y-hidden">
            <table class="table" id="items" style="table-layout: fixed">
                <thead class="thead-light">
                    <tr>
                        @stack('move_th_start')
                            <th class="border-top-0 border-right-0 border-bottom-0" style="width: 10px">
                                <div ></div>
                            </th>
                        @stack('move_th_end')

                        @if (!$hideItems)
                            @stack('name_th_start')
                                <th class="text-left border-top-0 border-right-0 border-bottom-0">
                                    {{ (trans_choice($textItems, 2) != $textItems) ? trans_choice($textItems, 2) : trans($textItems) }}
                                </th>
                            @stack('name_th_end')

                            @stack('move_th_start')
                                <th class="text-left border-top-0 border-right-0 border-bottom-0"></th>
                            @stack('move_th_end')
                        @endif

                        @stack('quantity_th_start')
                            <th class="text-center pl-2 border-top-0 border-right-0 border-bottom-0">
                                @if (!$hideQuantity)
                                    {{ trans($textQuantity) }}
                                @endif
                            </th>
                        @stack('quantity_th_end')
                        @stack('quantity_th_start')
                        <th class="text-center pl-2 border-top-0 border-right-0 border-bottom-0">{{trans('items.product_unit')}}</th>
                        @stack('quantity_th_end')
                        @stack('quantity_th_start')
                            <th class="text-center pl-2 border-top-0 border-right-0 border-bottom-0">{{trans('items.meter_square_header')}}</th>
                        @stack('quantity_th_end')

                        @stack('price_th_start')
                            <th class="text-right border-top-0 border-right-0 border-bottom-0 pr-1" style="padding-left: 5px;">
                                @if (!$hidePrice)
                                    {{ trans($textPrice) }}
                                @endif
                            </th>
                        @stack('price_th_end')

                        @stack('total_th_start')
                            <th class="text-right border-top-0 border-bottom-0 item-total">
                                @if (!$hideAmount)
                                    {{ trans($textAmount) }}
                                @endif
                            </th>
                        @stack('total_th_end')

                        @stack('remove_th_start')
                            <th class="border-top-0 border-right-0 border-bottom-0" style="width: 10px">
                                <div ></div>
                            </th>
                        @stack('remove_th_end')
                    </tr>
                </thead>

                <tbody id="{{ (!$hideDiscount && in_array(setting('localisation.discount_location', 'total'), ['item', 'both'])) ? 'invoice-item-discount-rows' : 'invoice-item-rows' }}" class="table-padding-05">
                    @include('components.documents.form.line-item')

                    @stack('add_item_td_start')
                        <tr id="addItem">
                            <td class="text-right border-bottom-0 p-0" colspan="7">
                                <x-select-item-button
                                    type="{{ $type }}"
                                    is-sale="{{ $isSalePrice }}"
                                    is-purchase="{{ $isPurchasePrice }}"
                                />
                            </td>
                        </tr>
                    @stack('add_item_td_end')
                </tbody>
            </table>
        </div>
    </div>
</div>