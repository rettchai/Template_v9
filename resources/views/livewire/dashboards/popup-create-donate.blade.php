<x-modal.card max-width="5xl" blur="sm" title="{{ $titleNameModel }}" blur wire:model.defer="isModelOpen">
    <x-label class="text-blue-500 text-4xl text-center mt-n4">ข้อมูลใบเสร็จรับเงิน</x-label>
    <x-label class="text-gray-700 text-4xl text-center mt-n4">
        เมื่อเจ้าหน้าตรวจสอบข้อมูลเสร็จสิ้นแล้วจะดำเนินการจัดส่งใบเสร็จรับเงินให้ภายใน 7 วันทำการ</x-label>
    <x-label class="text-red-500 text-4xl text-center my-n4">บริจาคเข้าเลขที่บัญชี 459-061882-6
        "ทุนเพื่อการศึกษาของนักศึกษามหาวิทยลัยเทคโนโลยีราชมงคลรัตนโกสินทร์"</x-label>
    {{-- <x-errors /> --}}
    <div class="row p-4">
        <div class="col-md-6">
            <div class="py-2 ">
                <h2>มีความประสงค์บริจาค</h2>
                <ul class="list-none border-1  pt-2  p-4 rounded-lg">
                    <li>
                        <x-checkbox wire:model="donate.FundID.1" value="1" id="right-1" label="ทุนการศึกษา" />
                        <x-input wire:model="donate.FundID.1.Amount"   wire:change="calSumTotal"  class="h-8 mt-n3 mb-2"
                            placeholder="ระบุยอดเงินบริจาค (ทุนการศึกษา) [บาท] "></x-input>
                        <ol class="pl-8 ">
                            <li>
                                <span class="text-sm"> - ให้นักศึกษาที่เรียนดี โดยมีเงื่อนไข [ไม่มีใส่ -]</span>
                                <x-input class="h-8" wire:model="donate.FundID.1.1"
                                    placeholder="ระบุเงื่อนไขให้นักศึกษาที่เรียนดี "></x-input>
                            </li>
                            <li>
                                <span class="text-sm"> - ให้แก่นักศึกษาที่ขาดแคลนทุนทรัพย์โดยมีเงือนไข [ไม่มีใส่
                                    -]</span>
                                <x-input class="h-8" wire:model="donate.FundID.1.2"
                                    placeholder="ระบุเงือนไขแก่นักศึกษาที่ขาดแคลนทุนทรัพย์">
                                </x-input>
                            </li>
                            <li>
                                <span class="text-sm"> - เพื่อนำเข้า กองทุน (ระบุชื่อกองทุน) [ไม่มีใส่ -]</span>
                                <x-input class="h-8" wire:model="donate.FundID.1.3"
                                    placeholder="ระบุชื่อกองทุนเพื่อนำเข้า กองทุน  "></x-input>
                                <x-input class="h-8" wire:model="donate.FundID.1.4" placeholder="ระบุเงื่อนไข  ">
                                </x-input>
                            </li>
                            <li>
                                <span class="text-sm"> - อื่นๆ (หากมีโปรดระบุ)</span>
                                <x-input class="h-8" wire:model="donate.FundID.1.5"
                                    placeholder="ระบุอื่นๆ  (หากมีโปรดระบุ)"></x-input>
                            </li>
                        </ol>
                    </li>
                </ul>

                <ul class="list-none border-1 pt-2  p-4">
                    <li>
                        <x-checkbox wire:model="donate.FundID.2" id="right-2" value="2" label="ทุนการวิจัย" />
                        <x-input class="h-8 mt-n3 mb-2"  wire:change="calSumTotal"  wire:model="donate.FundID.2.Amount"
                            placeholder="ระบุยอดเงินบริจาค (ทุนการศึกษา) [บาท] "></x-input>
                    </li>
                </ul>

                <ul class="list-none border-1 pt-2  p-4">
                    <li>
                        <x-checkbox wire:model="donate.FundID.3" id="right-3" value="3"
                            label="เพื่อใช้ในกิจกรรมของมหาวิทยาลัย" />
                        <x-input class="h-8 mt-n3 mb-2"  wire:change="calSumTotal" wire:model="donate.FundID.3.Amount"
                            placeholder="ระบุยอดเงินบริจาค (ทุนการศึกษา) [บาท] "></x-input>
                    </li>
                </ul>

            </div>

            <div class="py-2">
                <x-input class="mt-n2 h-8" wire:model="donate.ReceiptName" label="ได้รับเงินจาก (สำหรับลงใบเสร็จ)"
                    placeholder="กรุณาระบุได้รับเงินจาก" />
            </div>
            <div class="py-2">
                <x-input class="mt-n2 h-8" wire:model="donate.ReceiptTexID"
                    label="เลขประจำตัวผู้เสียภาษี (สำหรับลงใบเสร็จ)" placeholder="กรุณาระบุเลขประจำตัวผู้เสียภาษี" />
            </div>
            <div class="py-2">
                <x-textarea wire:model="donate.ReceiptAddress" class="mt-n2" label="ที่อยู่ในการออกใบเสร็จ"
                    placeholder="กรุณาระบุที่อยู่ในการออกใบเสร็จ" />
            </div>
            <div class="py-2">
                <x-textarea wire:model="donate.ReceiptSender" class="mt-n2" label="ที่อยู่ในการจัดส่งเอกสาร"
                    placeholder="กรุณาระบุที่อยู่ในการจัดส่งเอกสาร" />
            </div>

        </div>
        <div class="col-md-6">
            <div class="py-2">
                <x-input wire:model="donate.ContactName" class="mt-n2" label="ชื่อ-นามสกุล"
                    placeholder="กรุณาระบุชื่อ-นามสกุล" />
            </div>
            <div class="py-2">
                <x-input wire:model="donate.ContactTel" class="mt-n2" label="เบอร์โทร "
                    placeholder="กรุณาระบุเบอร์โทรศัพท์" />
            </div>
            <div class="py-2">
                {{-- @if ($sumTotal >= 1) --}}
                    {{-- <h3 class="text-blue-500" wire:model="sumTotal" >{{ $sumTotal }}</h3> --}}
                {{-- @endif --}}
                <x-input wire:model="donate.Amount" class="mt-n2" label="ยอดบริจาค "
                    placeholder="กรุณาระบุยอดบริจาค" />
            </div>
            <div class="py-2">
                <x-input type="date" wire:model="donate.DateTrafer" class="mt-n2" label="วันที่โอน"
                    placeholder="กรุณาระบุวันที่โอน" />
                {{-- <x-datetime-picker wire:model="donate.DateTrafer"  class="mt-n2" label="วันที่โอน" placeholder="กรุณาระบุวันที่โอน"
                    display-format="DD-MM-YYYY hh:ss" /> --}}
            </div>
            <div class="py-2">
                <x-input wire:model="donate.FileSlip" class="mt-n2" type="file" label="แนบไฟล์ Slip "
                    placeholder="กรุณาแนบไฟล์ Slip" />
            </div>
            <div class="py-2">
                @if (@$donate['FileSlip'])
                    Slip Preview:
                    <img src="{{ $donate['FileSlip']->temporaryUrl() }}">
                @endif
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <div class="flex justify-between gap-x-4">
            {{-- <x-button flat negative label="Delete" wire:click="delete" /> --}}
            <x-button flat label="Cancel" x-on:click="close" />

            <div class="flex">
                <x-button primary label="Save" wire:click="onClickCreateDonateSave" />
            </div>
        </div>
    </x-slot>
</x-modal.card>
