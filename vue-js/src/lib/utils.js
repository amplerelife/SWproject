import axios from 'axios'
import { clsx } from 'clsx'
import { twMerge } from 'tailwind-merge'

export function cn(...inputs) {
  return twMerge(clsx(inputs))
}

export function wrapIntoArray(_data) {
  if (!_data) return []

  if (_data instanceof Array) {
    return _data
  }

  if (_data instanceof Object) {
    return [_data]
  }

  return undefined
}

export async function getCurrUser() {
  try {
    const result = await axios.post('/api/account/login_get')
    if (!result.data.id) {
      return undefined
    }
    return result.data
  } catch (err) {
    console.error(err)
  }
}
