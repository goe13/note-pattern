module Property


    class ClassA
        def initialize

        end
        def shadowClone
            self.clone
        end
        def deepClone
           Marshal.load(Marshal.dump(self)) 
        end
    end

    <<-EOF

    浅拷贝与深拷贝

浅拷贝：obj.clone
深拷贝：Marshal.load(Marshal.dump(obj))，Marshal.dump(obj)是把obj递归地写入字符串或文件，Marshal.load生成一个与原对象状态相同的对象。其实是曲线实现了深拷贝。
    EOF

    
end