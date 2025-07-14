<template>
  <CContainer fluid class="min-vh-100 d-flex flex-column">
    <CHeader class="bg-light border-bottom py-2 px-3">
      <h5 class="m-0">Quản trị hệ thống</h5>
    </CHeader>

    <div class="d-flex flex-grow-1">
      <CSidebar class="bg-dark text-white p-3" style="width: 200px;">
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Trang chủ</a></li>
          <li><a href="#" class="text-white">Người dùng</a></li>
        </ul>
      </CSidebar>

      <CContainer class="p-4">
        <slot />
      </CContainer>
    </div>
  </CContainer>
</template>
