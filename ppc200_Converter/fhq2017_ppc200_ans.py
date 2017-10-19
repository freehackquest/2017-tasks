#!/usr/bin/env python
# -*- coding: utf-8 -*-

import hashlib

f_in = open('ppc200.txt', 'r')
f_out = open('ppc200_ans.txt', 'w')


def char_to_int(z):
    return int(z if ord(z) - ord('A') < 0 else 10 + ord(z) - ord('A'))


def int_to_char(z):
    return str(z if z < 10 else chr(z - 10 + ord('A')))


def x_to_dec(a, x):
    res = 0
    for i, k in enumerate(reversed(a)):
        res += char_to_int(k) * (x ** i)
    return res


def dec_to_x(a, x):
    res = ''
    while 1:
        t = int_to_char(a % x)
        a //= x
        res = str(t) + res
        if a == 0:
            break
    return res


while 1:
    res = f_in.readline().split()
    if len(res) != 5:
        break
    v1 = res[0]
    a = int(res[1])
    v2 = res[2]
    b = int(res[3])
    c = int(res[4])
    print 'dano)', res
    res = dec_to_x(x_to_dec(v1, a) + x_to_dec(v2, b), c)
    f_out.write(res + '\n')

f_in.close()
f_out.close()
f_res = open('ppc200_ans.txt', 'r')

res = ''.join(f_res.read().split('\n'))
print 'fhq{' + str(hashlib.md5(res).hexdigest()) + '}' # fhq{b5ab5b3284fb918bc5a41c55a1934f77}

f_res.close()
