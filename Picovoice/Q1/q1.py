import heapq as hq

SIZE_OF_HEAP = 3
       
class Book:
    # constructor
    def __init__(self, isb, bkname=None, author=None):
        self.bkname = bkname
        self.isb = isb
        self.author = author
        self.accessCount = 1
    
    def __lt__(self, next):
        return self.accessCount < next.accessCount

class bookCache:
    def __init__(self, size):
        self.h = []
        self.length = size
        hq.heapify(self.h)

    def printCache(self):
        for i in range(len(self.h)):
            print(self.h[i].bkname + ": " +  str(self.h[i].accessCount))

    def creatNewRecord(self, bkname, isb, author):
        if(len(self.h) < self.length):
            # cache is not full -> create a new record
            hq.heappush(self.h, Book(bkname, isb, author))
            #print("Created a new record")
        else:
            # cache is full; find victim to replace
            #print("Most leastly used: " + str(hq.nsmallest(1, self.h)[0].bkname))
            hq.heapreplace(self.h, Book(bkname, isb, author))
    
    def containAndUpdate(self, isb, bkname = None, author=None,):
        #print("ISB to find is: " + isb)
        try:
            #print("looking for isb in cache")
            if(any(x.isb == isb for x in self.h)):
                i = next((i for i, x in enumerate(self.h) if x.isb == isb), None)
                #print("index of " + isb + ": " + str(i))
                self.h[i].accessCount += 1
            else:                
                self.creatNewRecord(isb, bkname, author)
                #print("Record does not exist")
        finally:            
            hq.heapify(self.h)
            #print("Cache heapified")

print("Hello World from q1.py")

bookAccessCache = bookCache(SIZE_OF_HEAP)
print("Main: printing empty cache....")
bookAccessCache.printCache()

bookAccessCache.containAndUpdate("1", "A", "a")

print("Main: printing cache with 1 book")
bookAccessCache.printCache()

bookAccessCache.containAndUpdate("2", "B", "b")
bookAccessCache.containAndUpdate("3", "C", "c")

print("Main: printing a full cache")
bookAccessCache.printCache()

bookAccessCache.containAndUpdate("2")
bookAccessCache.containAndUpdate("2")
bookAccessCache.containAndUpdate("1")
print("Main: printing cache with access counts updated")
bookAccessCache.printCache()

bookAccessCache.containAndUpdate("4", "D", "d")
print("Main: Book D should be replaced by Book C")
bookAccessCache.printCache()

bookAccessCache.containAndUpdate("4", "D", "d")
bookAccessCache.containAndUpdate("4", "D", "d")
bookAccessCache.containAndUpdate("4", "D", "d")
print("Main: Book D should have the highest count for access")
bookAccessCache.printCache()
print("Main: Book A should be replaced by Book C")
bookAccessCache.containAndUpdate("3", "C", "c")
bookAccessCache.printCache()
