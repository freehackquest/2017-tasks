#!/usr/bin/env python
# -*- coding: utf-8 -*-

import hashlib

f_in = open('ppc300.txt', 'r')
f_out = open('ppc300_ans.txt', 'w')

ans = 0
while 1:
    res = f_in.readline().split()
    if len(res) != 2:
        break
    n = int(res[0])
    m = int(res[1])
    print 'dano)', n, m

    res = 0
    step = m - 1
    ranges = 1
    if m == 1:
        res = n
    else:
        while 1:
            ranges += step
            if ranges > n:
                break
            res += (n - ranges) + 1
    print 'res)', res
    ans += res
    f_out.write(str(res) + '\n')

f_in.close()
f_out.close()

res = str(ans)
print 'fhq{' + str(hashlib.md5(res).hexdigest()) + '}' # fhq{758c6a98578de0cb9fb89347e4fb0fad}
