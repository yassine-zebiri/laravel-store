<x-layout :pageTitle="$namePage">
    <x-card-content>
        <div class="row">
            <div class="col-lg-4 col-12 mb-5">
                <div class="bg-white pt-3 px-3">
                    <h3>الدفع</h3>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center py-3">
                        <div>المبلغ الاجمالي</div>
                        <div> <span x-text="price"></span>د.ج</div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-lg btn-dark w-100 mt-3">اكمال الدفع</button>
                </div>
            </div>
            <div class="col-lg-8 col-12 ">
                <div class="bg-white p-3">
                    <div class="">
                        <h3>لائحة الطلبات</h3>
                        <hr>
                    </div>
                    <template x-for="(item, index) in items" :key="index">
                        <div class="row align-items-center py-3 border-bottom
                        text-center row-gap-3
                        ">
                            <div class="col-lg-2 col-6 position-relative">
                                <span x-text="item.quantity" class=" position-absolute top-0 right-0 bg-dark-subtle 
                                px-2 py-1 rounded text-white border"></span>
                                <img :src="item.pic" width="100px" alt="" srcset="">
                            </div>
                            <div class="col-lg-3 col-6 text-end">
                                <p x-text="item.name">نظارات ديور Dior</p>
                            </div>
                            <div class="col-lg-3 col-4 d-flex align-items-center
                            column-gap-1 justify-content-center">
                                <button class="btn btn-dark" @click="changeQuantity(item.id,1)">+</button>
                                <div class="py-2 px-3 border rounded" x-text="item.quantity">0</div>
                                <button class="btn btn-dark"  @click="changeQuantity(item.id,-1)">-</button>
                            </div>
                            <div class="col-lg-2 col-4">
                                <p class="p-0 m-0">السعر : <span x-text="item.price*item.quantity">1</span>  </p>
                            </div>
                            <div class="col-lg-2 col-4">
                                <button @click="removeFormCart(index)" class="btn btn-danger" name="remove" value="1">حذف</button>
                            </div>
                        
                        </div>
                    </template>
        
                </div>
            </div>
        </div>
        </main>
        
        <!--end content---------------------------------------------------->
        
        
    </x-card-content>
</x-layout>