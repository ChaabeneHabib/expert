<script setup>
import { usePage, router } from '@inertiajs/vue3'
import { computed, ref } from 'vue'
import { containerMaxW } from '@/config.js'
import { useMainStore } from '@/Stores/main.js'
import { useStyleStore } from '@/Stores/style.js'
import { useLayoutStore } from '@/Stores/layout.js'
import {
  mdiForwardburger,
  mdiBackburger,
  mdiClose,
  mdiDotsVertical,
  mdiMenu,
  mdiClockOutline,
  mdiCloud,
  mdiCrop,
  mdiAccount,
  mdiCogOutline,
  mdiEmail,
  mdiLogout,
  mdiGithub,
  mdiThemeLightDark
} from '@mdi/js'
import NavBarItem from '@/Components/NavBarItem.vue'
import NavBarItemLabel from '@/Components/NavBarItemLabel.vue'
import NavBarMenu from '@/Components/NavBarMenu.vue'
import BaseDivider from '@/Components/BaseDivider.vue'
import UserAvatarCurrentUser from '@/Components/UserAvatarCurrentUser.vue'
import BaseIcon from '@/Components/BaseIcon.vue'
import NavBarSearch from '@/Components/NavBarSearch.vue'

const mainStore = useMainStore()

const userName = computed(() => usePage().props.auth.user.name)

const styleStore = useStyleStore()

const toggleLightDark = () => {
  styleStore.setDarkMode()
}

const layoutStore = useLayoutStore()

const isMenuNavBarActive = ref(false)

const menuNavBarToggle = () => {
  isMenuNavBarActive.value = !isMenuNavBarActive.value
}

const menuOpenLg = () => {
  layoutStore.isAsideLgActive = true
}

const logout = () => {
  router.post(route('logout'))
}
</script>

<template>
  <!-- <nav
    class="top-0 left-0 right-0 fixed bg-gray-50 h-14 z-30 w-screen transition-position xl:pl-60 lg:w-auto dark:bg-slate-800"
  >
    <div
      class="flex lg:items-stretch"
      :class="containerMaxW"
    >
      <div class="flex-1 items-stretch flex h-14">
        <NavBarItem
          type="flex lg:hidden"
          @click.prevent="layoutStore.asideMobileToggle()"
        >
          <BaseIcon
            :path="layoutStore.isAsideMobileExpanded ? mdiBackburger : mdiForwardburger"
            size="24"
          />
        </NavBarItem>
        <NavBarItem
          type="hidden lg:flex xl:hidden"
          @click.prevent="menuOpenLg"
        >
          <BaseIcon
            :path="mdiMenu"
            size="24"
          />
        </NavBarItem>
        <NavBarItem>
          <NavBarSearch />
        </NavBarItem>
      </div>
      <div class="flex-none items-stretch flex h-14 lg:hidden">
        <NavBarItem @click.prevent="menuNavBarToggle">
          <BaseIcon
            :path="isMenuNavBarActive ? mdiClose : mdiDotsVertical"
            size="24"
          />
        </NavBarItem>
      </div>
      <div
        class="absolute w-screen top-14 left-0 bg-gray-50 shadow
          lg:w-auto lg:items-stretch lg:flex lg:grow lg:static lg:border-b-0 lg:overflow-visible lg:shadow-none dark:bg-slate-800"
        :class="[isMenuNavBarActive ? 'block' : 'hidden']"
      >
        <div
          class="max-h-screen-menu overflow-y-auto lg:overflow-visible lg:flex lg:items-stretch lg:justify-end lg:ml-auto"
        >
          <NavBarMenu>
            <NavBarItemLabel
              :icon="mdiMenu"
              label="Sample menu"
            />

            <template #dropdown>
              <NavBarItem>
                <NavBarItemLabel
                  :icon="mdiClockOutline"
                  label="Item One"
                />
              </NavBarItem>
              <NavBarItem>
                <NavBarItemLabel
                  :icon="mdiCloud"
                  label="Item Two"
                />
              </NavBarItem>
              <BaseDivider nav-bar />
              <NavBarItem>
                <NavBarItemLabel
                  :icon="mdiCrop"
                  label="Item Last"
                />
              </NavBarItem>
            </template>
          </NavBarMenu>
          <NavBarMenu>
            <NavBarItemLabel :label="userName">
              <UserAvatarCurrentUser class="w-6 h-6 mr-3 inline-flex" />
            </NavBarItemLabel>

            <template #dropdown>
              <NavBarItem route-name="admin.account.info">
                <NavBarItemLabel
                  :icon="mdiAccount"
                  label="My Profile"
                />
              </NavBarItem>
              <NavBarItem>
                <NavBarItemLabel
                  :icon="mdiCogOutline"
                  label="Settings"
                />
              </NavBarItem>
              <NavBarItem>
                <NavBarItemLabel
                  :icon="mdiEmail"
                  label="Messages"
                />
              </NavBarItem>
              <BaseDivider nav-bar />
              <NavBarItem>
                <NavBarItemLabel
                  :icon="mdiLogout"
                  label="Log Out"
                />
              </NavBarItem>
            </template>
          </NavBarMenu>
          <NavBarItem
            is-desktop-icon-only
            @click.prevent="toggleLightDark"
          >
            <NavBarItemLabel
              :icon="mdiThemeLightDark"
              label="Light/Dark"
              is-desktop-icon-only
            />
          </NavBarItem>
          <NavBarItem
            href="https://github.com/balajidharma/laravel-vue-admin-panel"
            is-desktop-icon-only
          >
            <NavBarItemLabel
              :icon="mdiGithub"
              label="GitHub"
              is-desktop-icon-only
            />
          </NavBarItem>
          <NavBarItem
            is-desktop-icon-only
            @click="logout"
          >
            <NavBarItemLabel
              :icon="mdiLogout"
              label="Log out"
              is-desktop-icon-only
            />
          </NavBarItem>
        </div>
      </div>
    </div>
  </nav> -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
            <a
                class="nav-link sidebartoggler nav-icon-hover"
                id="headerCollapse"
                href="javascript:void(0)"
            >
                <i class="ti ti-menu-2"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
            </a>
        </li>
    </ul>
    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul
            class="navbar-nav flex-row ms-auto align-items-center justify-content-end"
        >
            <li class="nav-item dropdown">
                <a
                    class="nav-link nav-icon-hover"
                    href="javascript:void(0)"
                    id="drop2"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    <img
                    src="@/assets/images/profile/user-1.jpg"
                        alt=""
                        width="35"
                        height="35"
                        class="rounded-circle"
                    />
                </a>
                <div
                    class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                    aria-labelledby="drop2"
                >
                    <div class="message-body">
                        <a
                            href="javascript:void(0)"
                            class="d-flex align-items-center gap-2 dropdown-item"
                        >
                            <i class="ti ti-user fs-6"></i>
                            <p class="mb-0 fs-3">My Profile</p>
                        </a>
                        <a
                            href="javascript:void(0)"
                            class="d-flex align-items-center gap-2 dropdown-item"
                        >
                            <i class="ti ti-mail fs-6"></i>
                            <p class="mb-0 fs-3">My Account</p>
                        </a>
                        <a
                            href="javascript:void(0)"
                            class="d-flex align-items-center gap-2 dropdown-item"
                        >
                            <i class="ti ti-list-check fs-6"></i>
                            <p class="mb-0 fs-3">My Task</p>
                        </a>
                        <a
                            href="./authentication-login.html"
                            class="btn btn-outline-primary mx-3 mt-2 d-block"
                            >Logout</a
                        >
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
</template>
