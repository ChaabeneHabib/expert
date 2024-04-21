import {
  mdiAccountCircle,
  mdiMonitor,
  mdiGithub,
  mdiAccountKey,
  mdiAccountEye,
  mdiAccountGroup,
  mdiPalette
} from '@mdi/js'

export default [
  {
    link: '/admin',
    icon: mdiMonitor,
    name: 'Dashboard'
  },
  {
    link: '/admin/permission',
    icon: mdiAccountKey,
    name: 'Permissions'
  },
  {
    link: '/admin/role',
    icon: mdiAccountEye,
    name: 'Roles'
  },
  {
    link: '/admin/utilisateur',
    icon: mdiAccountGroup,
    name: 'Utilisateurs'
  },
  {
    link: '/admin/autoEcole',
    icon: mdiAccountGroup,
    name: 'Auto écoles'
  },
  {
    link: '/admin/demande',
    icon: mdiAccountGroup,
    name: 'Demandes inscriptions'
  },
  {
    link: '/admin/user',
    icon: mdiAccountGroup,
    name: 'Users'
  },
]
