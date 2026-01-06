# DNS Verification Commands

## Check if DNS is pointing correctly:

### From your local computer (Windows PowerShell):
```powershell
# Check A record for careermapper.in
nslookup careermapper.in

# Check A record for www.careermapper.in
nslookup www.careermapper.in

# Should show: 72.60.201.175
```

### Or use online tools:
- Visit: https://dnschecker.org
- Enter: `careermapper.in`
- Check if it shows: `72.60.201.175`

### Or from server (SSH):
```bash
# Check DNS resolution
dig careermapper.in +short
dig www.careermapper.in +short

# Should return: 72.60.201.175
```

## Verify HTTP is working:

Before SSL, make sure HTTP works:
- Visit: http://careermapper.in (should load your site)
- Visit: http://www.careermapper.in (should load your site)

If HTTP doesn't work, SSL won't work either!

